import React, { Component, useState } from "react";
import style from "./style.module.css";
import { Route } from "react-router-dom";
import axios from "axios";
import ListFilm from "../ListFilm";
import { useForm } from "react-hook-form";
import swal from "sweetalert";



const Add = () => {
  const { register, handleSubmit, watch, errors } = useForm();

  const onSubmit = (data) => {
    console.log(data);
  };

  const onSave = (e) => {
    e.preventDefault();
    // var {txtName, imge, txtCategory, txtLanguage} = this.state;
    // ListFilm('ListFilm', 'POST', {
    //   title: txtName,
    //   img: imge,
    //   theloai: txtCategory,
    //   ngonngu: txtLanguage
    // }).then(res =>{
    //   console.log(res);
    // });
    console.log(this.state);
  };
  const handleChange = (e) => {
    console.log(e);
  };

  const sweetalert = (data) => {
    swal({
      title: "Good job!",
      text: "You clicked the button!",
      icon: "success",
      buttons: true,
      dangerMode: true,
    });
    console.log(data);
  };
 
  return (
    <div className={style.right}>
      <div className="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <form onSubmit={handleSubmit(onSubmit)}>
          <h2>Thêm Phim</h2>
          
          <label>Nhập tên phim</label>
          <input
            placeholder="Nhập tên phim"
            className="d-flex mb-3"
            name="name_film"
            ref={register({ required: true })}
          ></input>
          <label>Chọn hình ảnh cho phim</label>
          <input
            className="d-flex mb-3"
            name="img"
            onChange={handleChange}
            type="file"
            ref={register({ required: true })}
          />
          <label>Nhập thể loại phim</label>
          <input
            placeholder="Nhập thể loại"
            className="d-flex mb-3"
            name="categrory"
            ref={register({ required: true })}
          ></input>
          
          <label>Nhập ngôn ngữ cho phim</label>
          <input
            className="d-flex mb-3"
            name="language"
            ref={register({ required: true })}
          />
          
          {errors.exampleRequired && <span>This field is required</span>}

          <input className="btn btn-success" type="submit" value="Đăng phim" onClick={handleSubmit(sweetalert)} />
        </form>
      </div>
    </div>
  );
};

export default Add;
