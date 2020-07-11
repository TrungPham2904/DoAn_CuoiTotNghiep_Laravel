import React from "react";
import CustomHeader from "../../Components/CustomHeader";
import style from "./style.module.css";
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link,
  useParams,
  useRouteMatch,
} from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import AddFilm from "../Add";
import RemoveFilm from "../Remove";
import FixFilm from "../Fix";
import ListFilm from "../ListFilm"
import User from '../User'



const children = {
  Add: {
    path: "Add",
    component: AddFilm,
    name: "Thêm phim",
  },
  Remove: {
    path: "Remove",
    component: RemoveFilm,
    name: "Xóa phim",
  },
  Fix: {
    path: "Fix",
    component: FixFilm,
    name: "Sửa phim",
  },
  ListFilm: {
    path: "ListFilm",
    component: ListFilm,
    name: "Danh Sách Phim",
  },
  User: {
    path: "User",
    component: User,
    name: "Người Dùng"
  }
};

function Admin(props) {
  console.log(props);
  const { url, path } = useRouteMatch();

  const handleClick = (page) => {
    props.history.push(page);
  };
  return (
   
    <Router>
      <div className={style.left}>
        <h1>Admin</h1>
        <div className={style.listAdmin}>
          {Object.values(children).map((route, i) => (
            <Link className={style.text_link} to={`${url}/${route.path}`}>
              {route.name}
            </Link>
          ))}
        </div>
        <Switch>
          <Route exact path={path}></Route>
          <Route path={`${path}/:topicId`}>
            <Topic routes={props.routes} />
          </Route>
        </Switch>
      </div>
      {/* <div className = {style.right}>
            <h1>Welcome to Admin</h1>
            <h3 className = {style.title}>Hãy chọn chức năng bên trái</h3>
      </div> */}
    </Router>
  );
}

function Topic({ routes }) {
  // The <Route> that rendered this component has a
  // path of `/topics/:topicId`. The `:topicId` portion
  // of the URL indicates a placeholder that we can
  // get from `useParams()`.
  let { topicId } = useParams();
  let Demo = children[topicId].component;
  return <Demo />;
}

export default Admin;