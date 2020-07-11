import React from 'react'
import style from './style.module.css'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faStar } from '@fortawesome/free-solid-svg-icons'


function CustomMyList(props) {

    return (
        <span className={style.box}>
            <a href = 'PlayMovie'><img src={props.image}></img></a>
            <p className={style.infor_film}>{props.content}</p>
            <div className={style.infor}>
                <div className={style.title}>
                    <p className = {style.name} >  {props.nameFilm}</p>
                    <p className = {style.catagrory}>{props.Category}</p>
                </div>
                <div className={style.start}>
                    <FontAwesomeIcon icon={faStar}> </FontAwesomeIcon>
                    <FontAwesomeIcon icon={faStar}> </FontAwesomeIcon>
                    <FontAwesomeIcon icon={faStar}> </FontAwesomeIcon>
                    <FontAwesomeIcon icon={faStar}> </FontAwesomeIcon>
                    <FontAwesomeIcon icon={faStar}> </FontAwesomeIcon>
                </div>
            </div>
        </span>
    )
}

export default CustomMyList;