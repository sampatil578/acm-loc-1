import React,{Component} from 'react';
import {Input,InputGroup,InputGroupAddon, InputGroupText, ListGroup, ListGroupItem, Badge } from 'reactstrap';

class Search extends Component {
    constructor(props){
    super(props);
    this.state={
        keyword: ''
    };
    this.changeInput=this.changeInput.bind(this);
    }

    changeInput(e) {
        let val=e.target.value;
        this.setState({keyword: val });
    }

    render(){
      var colors=["warning","danger","success","info","secondary"]
      var keyRegex=new RegExp(this.state.keyword, 'i');   
      console.log(keyRegex);
      const SearchResults=this.props.videos.map(
              (video)=>{
                if(((video.title).search(keyRegex)!==-1)||(this.props.fests[video.festid-1].name.search(keyRegex)!==-1)){
                  return(
                    <ListGroupItem tag="a" href={`home/${video.id}`} action key={video.id}> {video.title}  <Badge color={colors[video.festid%5]} pill> {this.props.fests[video.festid-1].name}</Badge></ListGroupItem>          
                  );
                }
                else return (
                  <div/>
                )
              }    );        

      return(

        <div className="container">
        <br/><br/><br/><br/>
        <div className="row">
        <InputGroup>
        <InputGroupAddon addonType="prepend">
          <InputGroupText>Enter something about the video : </InputGroupText>
        </InputGroupAddon>
        <Input value={this.state.keyword} onChange={this.changeInput} />
      </InputGroup>
      </div>
      <br/>
      <div className="search-result">
      <ListGroup>
      {SearchResults}
      </ListGroup>
      </div>
      </div>
        );
     }
}

export default Search;