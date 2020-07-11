import React, { Component } from 'react'
import style from './style.module.css'
import axios from 'axios'



class Remove extends Component{
    constructor(props){
        super(props);
        this.state = {
            product: []
        }
    }
    
    componentDidMount(){
        axios({
            method: 'GET',
            url: 'https://5ee0c4b130deff0016c3f5df.mockapi.io/DooFilm',
            data: null
        }).then(res =>{
            console.log(res);
            this.setState({
                product:res.data
            })
        }).then(err =>{
            console.log(err);
        });
    }
    render(){
        var {product} = this.state;
        return(
            <div>Hien o day</div>
        )
    }
}


export default Remove;