import React, { useEffect, useState } from "react";
import FacebookLoginBtn from "react-facebook-login";
import GoogleLogin from "react-google-login";
import FormControl from "@material-ui/core/FormControl";
import style from "./style.module.css";
import { useForm } from "react-hook-form";
import swal from 'sweetalert';
import 'react-bootstrap'


const Login = () => {
  const { register, handleSubmit, errors, watch } = useForm();

  const onSubmit = (data) => {
    console.log(data);
  };
  const handleChange = (e) => {
    console.log(e);
  };
  useEffect(() => {
    console.log(errors);
  }, [errors]);
  console.log(errors);

  const state = {
    auth: false,
    name: "",
    picture: "",
  };

  const componentClicked = () => {
    console.log("");
  };
  const responseFacebook = (repsponse) => {
    console.log(repsponse);
  };
  const responseGoogle = (response) => {
    console.log(response);
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

  let facebookData;
  let googleData;
  state.auth
    ? (facebookData = <div>Hi!</div>)
    : (facebookData = (
        <FacebookLoginBtn
          appId="577232673228660"
          autoLoad={false}
          fields="name,picture"
          onClick={componentClicked}
          callback={responseFacebook}
          cssClass="btnFacebook"
        />
      ));
  googleData = (
    <GoogleLogin
      clientId="301722701896-bmfipj3hhu3lvmcdu9horkcdviq4edo0.apps.googleusercontent.com"
      buttonText="Login"
      onSuccess={responseGoogle}
      onFailure={responseGoogle}
      cookiePolicy={"single_host_origin"}
      className={style.btnGoogle}
    />
  );

  return (
    <div className={style.loginBox}>
      <form onSubmit={handleSubmit(onSubmit)}>
        <div className={style.left}>
          <h1 className={style.singup}>Sign up</h1>
          <input
            className={style.txtEmail}
            type="text"
            placeholder="Email"
            name="email"
            ref={register({ required: true, maxLength: 50 })}
          ></input>
          {errors.email?.type === "required" && "bạn chưa nhập email"}
          {errors.email?.type === "maxLength" && "email của bạn quá dài"}
          <input
            className={style.txtPassword}
            style={{ display: "flex" }}
            type="password"
            placeholder="Password"
            name="password1"
            ref={register({ required: true, min: 5, maxLength: 80 })}
          ></input>
          {errors.password1?.type === "required" && "bạn chưa nhập email"}
          {errors.password1?.type === "maxLength" && "password của bạn quá dài"}
          <input
            style={{ display: "flex" }}
            type="password"
            placeholder="Confirm password"
            name="password2"
            ref={register({
              validate: (value) => value === watch("password1"),
              required: true,
            })}
            placeholder="confim password"
          ></input>

          {errors.password2 && "password không đúng"}
          <button
            onClick={handleSubmit(sweetalert)}
            className={style.submit}
            type="submit"
            value=""
          >
            singn me up
          </button>
        </div>
        <div className={style.right}>
          <div className={style.loginwith}>
            Sign in with
            <br />
            social network
          </div>
          <button
            style={{ width: "100%", height: "40px" }}
            className={style.socialSignin}
          >
            {facebookData}
          </button>
          <button
            style={{ marginTop: "50px", width: "100%", background: "white" }}
            className={style.socialSsignin}
          >
            {googleData}
          </button>
        </div>
        <div className={style.or}>OR</div>
      </form>
    </div>
  );
};
export default Login;
