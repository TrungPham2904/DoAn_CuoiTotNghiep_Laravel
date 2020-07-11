import React from "react";
import { Slide } from "react-slideshow-image";
import Carousel from "react-bootstrap/Carousel";
import img1 from "./slideshow(4).png";
import img2 from "./slideshow(5).jpg";
import img3 from "./slideshow(6).jpg";
import style from "./style.module.css"

const proprietes = {};

function slideShow() {
  return (
    <Carousel className = {style.slider}>
      <Carousel.Item>
        <img  style = {{height:'657px'}} className="d-block w-100" src={img3} alt="First slide" />
        <Carousel.Caption>
          {/* <h3>First slide label</h3>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> */}
        </Carousel.Caption>
      </Carousel.Item>
      <Carousel.Item>
        <img style = {{height:'657px'}} className="d-block w-100" src={img1} alt="Third slide" />

        <Carousel.Caption>
          {/* <h3>Second slide label</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> */}
        </Carousel.Caption>
      </Carousel.Item>
      <Carousel.Item>
        <img style = {{height:'657px'}} className="d-block w-100" src={img2} alt="Third slide" />

        <Carousel.Caption>
          {/* <h3>Third slide label</h3>
          <p>
            Praesent commodo cursus magna, vel scelerisque nisl consectetur.
          </p> */}
        </Carousel.Caption>
      </Carousel.Item>
    </Carousel>
  );
}
export default slideShow;
