import React,{Component} from 'react';
import {Navbar, Nav, NavbarToggler,Collapse,NavItem, NavbarBrand, Modal, ModalBody, ModalHeader, Button} from 'reactstrap';
import { NavLink } from 'react-router-dom';
import firebase from '../config';
import StyledFirebaseAuth from 'react-firebaseui/StyledFirebaseAuth';


function Logger(props){
  if(props.isSignedIn===false)
  return (
    <React.Fragment>
    <Button color="danger" outline onClick={props.signIn}>                    
   <span className="fa fa-sign-in fa-lg"></span> Login
   </Button>
    </React.Fragment>
  );
  else return(
    <React.Fragment>
      <Button color="danger" outline onClick={props.signOut}>                     
   <span className="fa fa-sign-out fa-lg"></span> Log out
   </Button>
    </React.Fragment>
  );
}
class Header extends Component{

    constructor(props){
        super(props);
        this.state={
         isNavOpen: false,
         isModalOpen: false,
         isSignedIn: false
        }
        this.toggleModal=this.toggleModal.bind(this);
        this.toggleNav=this.toggleNav.bind(this);
    }

    uiConfig = {
        signInFlow: "popup",
        signInOptions: [
          
          firebase.auth.EmailAuthProvider.PROVIDER_ID,
          firebase.auth.FacebookAuthProvider.PROVIDER_ID,
          firebase.auth.GithubAuthProvider.PROVIDER_ID
        ],
        callbacks: {
          signInSuccess: () => false
        }
      }
    
      componentDidMount = () => {
        firebase.auth().onAuthStateChanged(user => {
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
          this.setState({isSignedIn: !!user});
              this.props.changeSignIn();
        })
        
      
      }
      
    toggleNav(){
        this.setState({
            isNavOpen: !this.state.isNavOpen
        });
    }

    toggleModal() {
        this.setState({
          isModalOpen: !this.state.isModalOpen
        });
      }

    render(){
        return (
            <React.Fragment>
                 <Navbar dark expand="md" fixed="top">
                    <div className="container">
                     <NavbarToggler onClick={this.toggleNav}></NavbarToggler>
                     <NavbarBrand className="mr-auto text-danger" href="/home">
                     <img src="/logo.png" height="36" width="80" alt="ismVid"/>
                     </NavbarBrand>
                     <Collapse isOpen={this.state.isNavOpen} navbar>
                     <Nav navbar>
                        <NavItem>
                            <NavLink className="nav-link text-danger" to="/search">
                                <span className="fa fa-search fa-lg"/>Search
                            </NavLink>
                        </NavItem>
                        <NavItem>
                            <NavLink className="nav-link text-danger" to="/liked">
                                <span className="fa fa-thumbs-up fa-lg"/>Liked Videos
                            </NavLink>
                        </NavItem>
                     </Nav>
                     <Nav className="ml-auto" navbar>
                     <NavItem>
                        <Logger isSignedIn={this.state.isSignedIn} signIn={()=>{this.toggleModal()}} signOut={()=>{firebase.auth().signOut()}}/>
                     </NavItem>
                      </Nav>
                     </Collapse>
                    </div>
                 </Navbar>
                 <Modal isOpen={!this.state.isSignedIn&&this.state.isModalOpen} toggle={this.toggleModal}>
                     <ModalHeader toggle={this.toggleModal}>
                         Login
                     </ModalHeader>
                     <ModalBody>
                     <StyledFirebaseAuth
                        uiConfig={this.uiConfig}
                        firebaseAuth={firebase.auth()}
                        />
                     </ModalBody>
                 </Modal>
                </React.Fragment>
        );
    }
}

export default Header;