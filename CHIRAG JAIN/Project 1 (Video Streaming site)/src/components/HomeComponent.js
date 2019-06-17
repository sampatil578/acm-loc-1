import React from 'react';
import {Jumbotron, Card, CardImg, CardFooter} from 'reactstrap';
import {Link} from 'react-router-dom';

function RenderVideos(props){

        return props.fests.map( (fest)=>{
            let required=props.videos.filter((video)=>(fest.id===video.festid));
            
            return (
                <React.Fragment>
                <div className="row mt-2">
                <h2 align="center">{fest.name}</h2>  
                <br/>
                </div>           
                <div className="row justify-content-center">
                {
                    required.map((video)=>{
                return (
                <div className="col-12 col-sm-6 col-md-3" key={video.id}>
                <Card className="linked">
                <Link to={`/home/${video.id}`}>
                <CardImg top width="100%" src={'./images/'+video.thumbnail} alt={video.title} />
                <CardFooter>{video.title}</CardFooter>
                </Link>
                </Card>
                </div>
                );
                })
                }
                </div>
                </React.Fragment>
        );
                 
    });
}


function Home(props){

    return(
        <React.Fragment>
        <Jumbotron>
        <div className="container">
        <div className="row row-header">
        <div className="col-12 col-sm-6">
            <br/>
                          <h1 >ismVid</h1>
                       <h6 >Welcome to the video streaming site of IIT(ISM). 
                           Here, you can enjoy all the videos of various fests of the college, 
                           like, comment or share them. You are free to suggest more videos.</h6>
                       <h6 >You are also requested to provide feedback to us regarding this website.</h6>
        </div>        
        </div>
        </div>
        </Jumbotron>
        <div className="container">
        <RenderVideos fests={props.fests} videos={props.videos}/>
        </div>
        </React.Fragment>       
    );

}

export default Home;