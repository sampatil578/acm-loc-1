import React, {Component} from 'react';
import Header from './HeaderComponent.js';
import Footer from './FooterComponent.js';
import Home from './HomeComponent.js';
import Search from './SearchComponent.js';
import VideoPlay from './VideoPlayComponent.js';
import firebase from '../config';
import {Switch,Route,Redirect} from 'react-router-dom';
import {FESTS} from '../shared/fests';
import {VIDEOS} from '../shared/videos';
import LikedVideos from './LikedVideos';
import 'firebase/database';



class Main extends Component {

constructor(props){
    super(props);
    this.state={
        fests: FESTS,
        videos: VIDEOS,
        isSignedIn: false,
        userEmail: "",
        userName: "Anonymous",
        comments: [],
        likes:[]
    };
    this.updateUser=this.updateUser.bind(this);
    this.changeSignIn=this.changeSignIn.bind(this);
    this.addLike=this.addLike.bind(this);
    this.addComment=this.addComment.bind(this);
  }

changeSignIn(){
if(firebase.auth().currentUser!==null)
  this.setState({isSignedIn: true});
else
this.setState({isSignedIn: false});
}

addComment(videoId,text){
  
  if(firebase.auth().currentUser===null)
  this.setState({isSignedIn: false});

 if(this.state.comments){
  let commentSnap;
  let commentsData=firebase.database().ref('comments');
   commentsData.on('value',(snapshot)=>{
    commentSnap=[...snapshot.val()]   
      })
      let name=this.state.userName;
      let len=commentSnap.length;
      let today=new Date();
      commentSnap.push({'id': Number(len+1),'movieId': (videoId),'text': text, 'author': name,'date': String(today)});
      alert('Comment submitted successfully');
      commentsData.set(commentSnap);      
}
else{
  alert('Server is taking time to respond. Please try again after sometime.')
}
}

addLike(videoId){
  if(firebase.auth().currentUser===null)
  this.setState({isSignedIn: false});

  if(this.state.isSignedIn===false)
  {
    alert('You need to log in first, to contribute 1 like.');
  }
  else if(this.state.likes){
    let oldSnap;
    let len=this.state.likes[videoId-1].userEmail.length;
   let likesData=firebase.database().ref('likes/'+(videoId-1)+'/userEmail');
   likesData.on('value',(snapshot)=>{
    oldSnap=[...snapshot.val()]   
      });
      let email=this.state.userEmail;
      let index;
      let i;
      for(i=0; i<oldSnap.length; i++){
       if(oldSnap[i].email===email) {
         index=i;
         break;
       }
      }
      if(i===oldSnap.length) index=-1;
          if(index===-1)  
         {
           oldSnap.push({'email': email});
           alert('Like submitted successfully');
           likesData.set(oldSnap);
        }
          else {
          oldSnap.splice(index,1);
          alert('Like removed successfully');
          likesData.set(oldSnap);
         }
   
    }
    else alert('Server Error');
}

updateUser(){
  if(firebase.auth().currentUser!==null)
    {
      this.setState({      userEmail: firebase.auth().currentUser.email,
      userName: firebase.auth().currentUser.displayName
    });
    }
    else{
      this.setState({      userEmail: "",
        userName: 'Anonymous'
      });
    }
}

componentDidMount(){
      firebase.auth().onAuthStateChanged(user => {
      this.updateUser();
          this.changeSignIn();
    });

let commentRef=firebase.database().ref('comments');
commentRef.on('value',(snapshot)=>{
let comments=snapshot.val();
let newstate=[];
for(let commentId in comments){
  newstate.push({
    id: commentId,
    movieId: comments[commentId].movieId,
    text: comments[commentId].text,
    author: comments[commentId].author,
    date: comments[commentId].date
  });
}
this.setState({
  comments: newstate
});
});

let likeRef=firebase.database().ref('likes');
likeRef.on('value',(snapshot)=>{
let likes=snapshot.val();
let newlikestate=[];
for(let likeId in likes){
  newlikestate.push({
    id: likeId,
    movieId: likes[likeId].movieId,
    userEmail: likes[likeId].userEmail
   });
}
this.setState({
  likes: newlikestate
});
});
}

render(){
  
  const VideoWithId = ({match}) => {
    return(
      <VideoPlay video={this.state.videos.filter((video) => video.id === parseInt(match.params.videoId,10))[0]}
                  userEmail={this.state.userEmail}
                  userName={this.state.userName}
                  isSignedIn={this.state.isSignedIn}
                  comments={this.state.comments}
                  likes={this.state.likes}
                  addLike={this.addLike}
                  addComment={this.addComment}
                  changeSignIn={this.changeSignIn}
                  updateUser={this.updateUser}
      />
      );
  };

return ( 
      <div className="App">
      <Header changeSignIn={this.changeSignIn} isSignedIn={this.state.isSignedIn}/>
      <Switch location={this.props.location}>
                  <Route exact path='/home' component={() => <Home fests={this.state.fests} videos={this.state.videos} />} />
                  <Route path='/home/:videoId' component={VideoWithId} />
                  <Route exact path='/search' component={() => <Search fests={this.state.fests} videos={this.state.videos}/>}/>
                  <Route exact path='/liked' component={() => <LikedVideos fests={this.state.fests} videos={this.state.videos} userEmail={this.state.userEmail} likes={this.state.likes} isSignedIn={this.state.isSignedIn}/>}/>
                  <Redirect to="/home"/>
      </Switch>
    <Footer changeSignIn={this.changeSignIn} userName={this.state.userName}/>
      </div>
       );     
}
}
export default Main;