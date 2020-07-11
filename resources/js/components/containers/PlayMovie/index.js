import React from "react";
import style from "./style.module.css";
import CustomHeader from "../../Components/CustomHeader";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faThumbsUp, faStar } from "@fortawesome/free-solid-svg-icons";
import { Link } from "react-router-dom";



function PlayMovie() {
  return (
    <div className={style.main}>
      <div className={style.left}>
        <CustomHeader />
      </div>
      <div className={style.right}>
        <div className="row">
          <div className="col-sm-4">
            <div className="card" style={{ width: "21rem" }}>
              <img
                src="imgs/3in1.jpg"
                style={{ height: "450px" }}
                className="card-img-top"
              ></img>
              <div
                className=" card-body d-flex position-absolute bg"
                style={{
                  top: "82.5%",
                  background: "rgba(0, 0, 0, 0.5)",
                  width: "100%",
                  borderRadius: "8px",
                }}
              >
                <a className="btn btn-success" style={{ marginRight: "10px" }}>
                  <Link to="/">Dowload</Link>
                </a>
                <a className="btn btn-danger" style={{ marginRight: "10px" }}>
                  <Link to="/">Trailer</Link>
                </a>
                <a className="btn btn-info">
                  <Link to="/ActionFilm">Xem Phim</Link>
                </a>
              </div>
            </div>
          </div>
          <div className=" titleFilm col-sm-4 " style={{ marginLeft: "70px" }}>
            <div className="card" style={{ width: "21rem" }}>
              <div className="card-body">
                <h3>3 Trong 1</h3>
                <p>Trạng thái: Vietsub 720p</p>
                <p>Sắp chiếu: Vietsub 1080p</p>
                <p>Đạo diễn:Updating....</p>
                <p>Diễn viên:Updating...</p>
                <p>Thể loại: hài hước</p>
                <div className="d-flex like">
                  <a
                    className="btn btn-primary"
                    style={{ marginRight: "10px" }}
                  >
                    <FontAwesomeIcon
                      style={{ marginRight: "5px", color: "white" }}
                      icon={faThumbsUp}
                    ></FontAwesomeIcon>
                    <Link to="/">Thích</Link>
                  </a>
                  <a className="btn btn-primary">
                    <Link to="/">Chia sẻ</Link>
                  </a>
                </div>
              </div>
            </div>
            <div className="card d-flex" style={{ width: "21rem" }}>
              <div className="card-body">
                <p
                  style={{
                    color: "yellowgreen",
                    fontSize: "20px",
                    fontWeight: "600",
                  }}
                >
                  Đánh giá Phim
                </p>
                <div className={style.start}>
                  <FontAwesomeIcon icon={faStar}></FontAwesomeIcon>
                  <FontAwesomeIcon icon={faStar}></FontAwesomeIcon>
                  <FontAwesomeIcon icon={faStar}></FontAwesomeIcon>
                  <FontAwesomeIcon icon={faStar}></FontAwesomeIcon>
                  <FontAwesomeIcon icon={faStar}></FontAwesomeIcon>
                  <FontAwesomeIcon icon={faStar}></FontAwesomeIcon>
                  <FontAwesomeIcon icon={faStar}></FontAwesomeIcon>
                  <FontAwesomeIcon icon={faStar}></FontAwesomeIcon>
                  <FontAwesomeIcon icon={faStar}></FontAwesomeIcon>
                  <FontAwesomeIcon icon={faStar}></FontAwesomeIcon>
                  <p className={style.raiting} style={{ marginLeft: "10px" }}>
                    do te
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
export default PlayMovie;
