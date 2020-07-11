import React, { useState, useEffect } from "react";
import style from "./style.module.css";
import { Drawer, Button } from "rsuite";
import { Switch, Route, Link } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {
  faFilm,
  faLaptop,
  faPlayCircle,
  faDove,
  faCamera,
  faStar,
  faVideo,
  faVideoSlash,
  faTv,
  faTablet,
  faHome,
} from "@fortawesome/free-solid-svg-icons";
import SideNav, {
  Toggle,
  Nav,
  NavItem,
  NavIcon,
  NavText,
} from "@trendmicro/react-sidenav";
import "@trendmicro/react-sidenav/dist/react-sidenav.css";
import { Router } from "react-router-dom";

function CustomHeader() {
  // const [isShow, setIsShow] = useState(false)
  let height =
    window.innerHeight ||
    document.documentElement.clientHeight ||
    document.body.clientHeight;
  return (
    <div className={style.left}>
      <Route
        render={({ location, history }) => (
          <React.Fragment>
            {/* expanded={true}  bat tat sideNav */}
            <SideNav
              style={{
                background: "#363636",
                // borderRadius: "10px",
                height: "120%",
                opacity: "0.9"
              }}
              onSelect={(selected) => {
                const to = "/" + selected;
                if (location.pathname !== to) {
                  history.push(to);
                }
              }}
            >
              <SideNav.Toggle className={style.tg} />
              <SideNav.Nav defaultSelected="Home" className={style.nav}>
                <NavItem style={{ marginTop: "20px" }} eventKey="Home">
                  <NavIcon>
                    <FontAwesomeIcon icon={faHome}></FontAwesomeIcon>
                  </NavIcon>
                  <NavText>
                    <Link to="/">DOOFILM</Link>
                  </NavText>
                </NavItem>
                <NavItem style={{ marginTop: "20px" }} eventKey="Seris">
                  <NavIcon>
                    <FontAwesomeIcon icon={faFilm}></FontAwesomeIcon>
                  </NavIcon>
                  <NavText>
                    <Link to="/Seris">Seris</Link>
                  </NavText>
                </NavItem>
                <NavItem style={{ marginTop: "20px" }} eventKey="MyList">
                  <NavIcon>
                    <FontAwesomeIcon icon={faTv}></FontAwesomeIcon>
                  </NavIcon>
                  <NavText>
                    <Link to="/MyList">Danh sách của tôi</Link>
                  </NavText>
                </NavItem>
                <NavItem style={{ marginTop: "20px" }} eventKey="Features">
                  <NavIcon>
                    <FontAwesomeIcon icon={faStar}></FontAwesomeIcon>
                  </NavIcon>
                  <NavText>
                    <Link to="/Features">Phim truyện</Link>
                  </NavText>
                </NavItem>
                <NavItem style={{ marginTop: "20px" }} eventKey="Documents">
                  <NavIcon>
                    <FontAwesomeIcon icon={faVideo}></FontAwesomeIcon>
                  </NavIcon>
                  <NavText>
                    <Link to="/Documents">Phim tài liệu</Link>
                  </NavText>
                </NavItem>
                <NavItem style={{ marginTop: "20px" }} eventKey="Shorsy">
                  <NavIcon>
                    <FontAwesomeIcon icon={faVideoSlash}></FontAwesomeIcon>
                  </NavIcon>
                  <NavText>
                    <Link to="/Shorsy">phim ngắn</Link>
                  </NavText>
                </NavItem>
                <NavItem style={{ marginTop: "20px" }} eventKey="Show">
                  <NavIcon>
                    <FontAwesomeIcon icon={faTv}></FontAwesomeIcon>
                  </NavIcon>
                  <NavText>
                    <Link to="/Show">Chương trình TV</Link>
                  </NavText>
                </NavItem>
                <NavItem style={{ marginTop: "20px" }} eventKey="About">
                  <NavIcon>
                    <FontAwesomeIcon icon={faTablet}></FontAwesomeIcon>
                  </NavIcon>
                  <NavText>
                    <Link to="/About">Về chúng tôi</Link>
                  </NavText>
                </NavItem>
              </SideNav.Nav>
            </SideNav>
          </React.Fragment>
        )}
      />
    </div>
  );
}

export default CustomHeader;
