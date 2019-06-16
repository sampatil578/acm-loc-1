import React,{Component} from 'react';
import {Button,Modal,ModalBody,ModalHeader,ModalFooter,Input,InputGroup,InputGroupAddon, InputGroupText} from 'reactstrap';
import {Link} from 'react-router-dom';
import firebase from '../config';
import 'firebase/database';


class Footer extends Component {

    constructor(props){
        super(props);
        this.state={
            isSuggestionOpen: false,
            isFeedbackOpen: false,
            url:'',
            message:'',
            description:''
        }
        this.toggleFeedback=this.toggleFeedback.bind(this);
        this.toggleSuggestion=this.toggleSuggestion.bind(this);
        this.changeDescription=this.changeDescription.bind(this);
        this.changeMessage=this.changeMessage.bind(this);
        this.changeURL=this.changeURL.bind(this);
    }

    toggleSuggestion(){
        this.setState({isSuggestionOpen: !this.state.isSuggestionOpen});
    }

    toggleFeedback(){
        this.setState({isFeedbackOpen: !this.state.isFeedbackOpen});
    }

    changeDescription(e){
        let val=e.target.value;
  this.setState({description: val });
    }

    changeMessage(e){
        let val=e.target.value;
  this.setState({message: val });
    }

    changeURL(e){
        let val=e.target.value;
  this.setState({url: val });
    }
    
    addFeedback(message){
        if(firebase.auth().currentUser===null)
            this.setState({isSignedIn: false});
        let feedbackSnap;
        let feedbackData=firebase.database().ref('feedbacks');        
                let name=this.props.userName;
        feedbackSnap={'message': message, 'userName': name};
        feedbackData.push(feedbackSnap);
        alert('Feedback submitted successfully');
  
      }
    
      addSuggestion(url,description){
      
        if(firebase.auth().currentUser===null)
            this.setState({isSignedIn: false});
      
        let suggestionSnap;
        let suggestionData=firebase.database().ref('suggestions');
            let name=this.props.userName;
            suggestionSnap={'url': url, 'description': description,'userName': name};
            suggestionData.push(suggestionSnap);
            alert('Suggestion submitted successfully');
      }
    
    render(){
    return(
    <div>
    <div className="footer mt-3">
        <div className="container">
            <div className="row justify-content-center">             
                <div className="col-11 offset-1 col-sm-2">
                    <Link to=''>
                    <h4 align="center">ismVid</h4>
                    </Link>
                    <h5 align="center"> The Video Streaming website of IIT (ISM)</h5>
                </div>
                <div className="col-6 col-sm-5 align-self-center">
                <div className="text-center ">
                <Button color="primary" size="md" onClick={this.toggleSuggestion} active>Suggest a video</Button>
                </div>
                </div>
                <div className="col-6 col-sm-4 align-self-center">
                    <div className="text-center">
                    <Button color="success" size="md" onClick={this.toggleFeedback} active>Give Feedback</Button>
                    </div>
                </div>
            </div>
            <div className="row justify-content-center">             
                <div className="col-auto">
                    <br/>
                    <p>© Copyright 2019 Chirag Jain</p>
                </div>
            </div>
        </div>
    </div>
     <Modal isOpen={this.state.isSuggestionOpen} toggle={this.toggleSuggestion} className="info">
     <ModalHeader toggle={this.toggleSuggestion}>Suggestion</ModalHeader>
     <ModalBody>
      Name of author : {(this.props.userName==='Anonymous')?'Anonymous (Log in to get your name here)':this.props.userName}<br/><br/>
      <InputGroup>
   <InputGroupAddon addonType="prepend">
     <InputGroupText>URL : </InputGroupText>
   </InputGroupAddon>
   <Input value={this.state.url} onChange={this.changeURL} />
 </InputGroup>
<InputGroup>
 <InputGroupAddon addonType="prepend">
     <InputGroupText>Description : </InputGroupText>
   </InputGroupAddon>
   <Input value={this.state.description} onChange={this.changeDescription} />
 </InputGroup>
     </ModalBody>
     <ModalFooter>
       <Button color="primary" onClick={(e)=>{
                                         e.preventDefault();
                                         if(this.state.url==='') {
                                           alert('Please enter some url of the video');
                                         }
                                         else{
                                         this.toggleSuggestion();
                                         this.addSuggestion(this.state.url,this.state.description);
                                         }
                                       }}>Submit</Button>{' '}
     </ModalFooter>
   </Modal>
    <Modal isOpen={this.state.isFeedbackOpen} toggle={this.toggleFeedback} className="warning">
    <ModalHeader toggle={this.toggleFeedback}>Feedback</ModalHeader>
    <ModalBody>
     Name of author : {(this.props.userName==='Anonymous')?'Anonymous (Log in to get your name here)':this.props.userName}<br/><br/>
     <InputGroup>
  <InputGroupAddon addonType="prepend">
    <InputGroupText>Enter feedback : </InputGroupText>
  </InputGroupAddon>
  <Input type="textarea" value={this.state.message} onChange={this.changeMessage} />
</InputGroup>
    </ModalBody>
    <ModalFooter>
      <Button color="primary" onClick={(e)=>{
                                        e.preventDefault();
                                        if(this.state.message==='') {
                                          alert('Please enter some text as the feedback.');
                                        }
                                        else{
                                          this.toggleFeedback();
                                          this.addFeedback(this.state.message);
                                        }
                                      }}>Submit</Button>{' '}
    </ModalFooter>
  </Modal>
  </div>
    );
}
}

export default Footer;
