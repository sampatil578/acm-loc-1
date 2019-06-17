import React,{Component} from 'react';
import {Card,CardBody, CardText, Spinner, CardTitle, Button,ListGroup,ListGroupItem,
  ListGroupItemText,ListGroupItemHeading, UncontrolledPopover,PopoverBody,PopoverHeader,
  Modal,ModalBody,ModalHeader,ModalFooter,Input,InputGroup,InputGroupAddon, InputGroupText} 
  from 'reactstrap';
import {
  FacebookShareButton,
  TwitterShareButton,
  WhatsappShareButton,
  InstapaperShareButton,
} from 'react-share';
function ShareButtons(props){
  function FBbutton(){
    return (
      <Button color="primary"><i className="fa fa-facebook"/> Post</Button>
    );
  }
  function Tweetbutton(){
    return (
      <Button color="info"><i className="fa fa-twitter"/> Tweet</Button>
    );
  }
  function Instabutton(){
    return (
      <Button color="warning"><i className="fa fa-instagram"/> Insta</Button>
    );
  }
  function Whatsappbutton(){
    return (
      <Button color="success"><i className="fa fa-whatsapp"/> Share</Button>
    );
  }
 
  return(
  <div className="ml-auto">
  <Button color="secondary" id="share" type="button"><i className="fa fa-share-alt"/> Share</Button>
  <UncontrolledPopover trigger="legacy" placement="left" target="share">
        <PopoverHeader>Share </PopoverHeader>
        <PopoverBody>
        <FacebookShareButton url={window.location.href} children={FBbutton()} quote={props.video.description}/>
  &nbsp;<InstapaperShareButton url={window.location.href} children={Instabutton()} title={props.video.title} description={props.video.description}/>
  &nbsp;<TwitterShareButton url={window.location.href} children={Tweetbutton()} title={props.video.title} via={props.video.description}/>
  &nbsp;<WhatsappShareButton url={window.location.href} children={Whatsappbutton()} title={props.video.title}/>
          </PopoverBody>
      </UncontrolledPopover>
  
  </div>
    );
  }

class VideoPlay extends Component{

constructor(props){
  super(props);
  this.state={
    isModalOpen: false,
    commentText: ''
  };
  this.toggleModal=this.toggleModal.bind(this);
  this.changeInput=this.changeInput.bind(this);
}

toggleModal(){
  this.setState((state) => ({
    isModalOpen: !state.isModalOpen
  }));
}


changeInput(e) {
  let val=e.target.value;
  this.setState({commentText: val });
}

render(){    
  let requiredComments =this.props.comments.filter((comment)=>(comment.movieId===this.props.video.id)
        );

        let RenderComments=requiredComments.map(
            (comment)=>{return (
          <ListGroupItem key={comment.id}>
          <ListGroupItemHeading>{comment.author}</ListGroupItemHeading>
          <ListGroupItemText>
                {comment.text}<br/>
               <i> {new Intl.DateTimeFormat('en-US',{year: 'numeric', month: 'short', day: '2-digit'}).format(new Date( Date.parse(comment.date)))}</i>
          </ListGroupItemText>
        </ListGroupItem>
            )    ;
            }
        );
        let requiredLikes=(this.props.likes.filter((like)=>(like.movieId===this.props.video.id) )[0]);

    return(
            <React.Fragment>
            
            <br/>
            <br/><br/>
            <Card>
            <div className="video_Container"> <iframe src={this.props.video.src} width="100%" title={this.props.video.title} className="frame" height="100%" frameborder="0" scrolling="auto" allowfullscreen></iframe> </div>
            <CardBody>
            <div className="container">
            <CardTitle><h3>{this.props.video.title}</h3></CardTitle>
            <CardText>{this.props.video.description}</CardText>
            <div className="row">
            <div className="mr-auto">
            <Button onClick={()=>{this.props.addLike(this.props.video.id)}} color="primary"><i className="fa fa-thumbs-up"></i> 
             &nbsp;{requiredLikes!==undefined?requiredLikes.userEmail.length:(<Spinner type="grow" color="light" size="sm"/>)}
            </Button>
            &nbsp;&nbsp;<Button color="success" onClick={this.toggleModal}><i className="fa fa-pencil"></i>Comment</Button>
            </div>
           <ShareButtons video={this.props.video}/>			
        </div>
        <br/>
        <ListGroup>
        <ListGroupItem active>
          <ListGroupItemHeading>{(requiredComments.length>0)?requiredComments.length:(<Spinner type="grow" color="light" size="md" />)} Comments</ListGroupItemHeading>
          </ListGroupItem>
        {RenderComments}
        </ListGroup>
            </div>
            </CardBody>
            </Card>
            <Modal isOpen={this.state.isModalOpen} toggle={this.toggleModal} className="warning">
          <ModalHeader toggle={this.toggleModal}>Comment</ModalHeader>
          <ModalBody>
           Name of author : {(this.props.userName==='Anonymous')?'Anonymous (Log in to get your name here)':this.props.userName}<br/><br/>
           <InputGroup>
        <InputGroupAddon addonType="prepend">
          <InputGroupText>Enter comment : </InputGroupText>
        </InputGroupAddon>
        <Input type="textarea" value={this.state.commentText} onChange={this.changeInput} />
      </InputGroup>
          </ModalBody>
          <ModalFooter>
            <Button color="primary" onClick={(e)=>{
                                              e.preventDefault();
                                              if(this.state.commentText==='') {
                                                alert('Please enter some text in the comment.');
                                              }
                                              else{
                                                this.toggleModal();
                                              this.props.addComment(this.props.video.id,this.state.commentText);
                                              }
                                            }}>Submit</Button>{' '}
          </ModalFooter>
        </Modal>
            </React.Fragment>
            );
}
}

export default VideoPlay;