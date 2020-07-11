import React from 'react'
import style from './style.module.css'
import CustomHeader from '../../Components/CustomHeader'


function ActionFilm(){
    return(
    <div>
            <div>
                <CustomHeader/>
            </div>
            <div className = {style.action}>
                <video controls autoPlay = "true" height = "500px" width = "1000px">
                    <source src = "video/Project.mp4" type = "video/mp4"></source>
                </video>
            </div>
            <div className = {style.comment}>
                <p>Comment o day</p>
            </div>
      
    </div>
      )
}

export default ActionFilm;