import React from 'react';
import {ListGroup, ListGroupItem, Badge,Spinner } from 'reactstrap';
import firebase from '../config';
import 'firebase/database';

function LikedVideos(props){
if(props.isSignedIn===false) return(
<div className="search-result text-center">
    <br/><br/><br/><br/><br/>
    <h3>Please log in to view this page</h3>
</div>
);
var colors=["warning","danger","success","info","secondary"];

const RequiredVideos=props.videos.map(
        (video)=>{
            let i,index,Snap;         
            let likesData=firebase.database().ref('likes/'+(video.id-1)+'/userEmail');
   likesData.on('value',(snapshot)=>{
    Snap=[...snapshot.val()]   
      });    
            if(Snap!==undefined){
            for(i=0; i<Snap.length; i++){
                if(Snap[i].email===props.userEmail) {
                  index=i;
                  break;
                }
               }
               if(i===Snap.length) index=-1;
          if(index!==-1){
            return(
              <ListGroupItem tag="a" href={`home/${video.id}`} action key={video.id}> {video.title}  <Badge color={colors[video.festid%5]} pill> {props.fests[video.festid-1].name}</Badge></ListGroupItem>          
            );
          }
          else return (
            <div/>
          )
        }
        else if(video.id===4) return (
          <div className="text-center">
            <Spinner color="primary" />
            </div>
        )   ;
     } );        

return(

  <div className="container">
  <br/>
<br/><br/>
<div className="search-result">
<br/>
<ListGroup>
{RequiredVideos}
</ListGroup>
</div>
</div>
  );
}
export default LikedVideos;
