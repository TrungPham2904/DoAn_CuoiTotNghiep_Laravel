import React, { useState, useEffect } from "react";
import { useSelector, useDispatch } from "react-redux";
import style from "./style.module.css";
import { Route, Link } from "react-router-dom";
import axios from "axios";
import Table from "@material-ui/core/Table";
import TableBody from "@material-ui/core/TableBody";
import TableCell from "@material-ui/core/TableCell";
import TableContainer from "@material-ui/core/TableContainer";
import TableHead from "@material-ui/core/TableHead";
import TableRow from "@material-ui/core/TableRow";
import Paper from "@material-ui/core/Paper";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faPen, faTrash } from "@fortawesome/free-solid-svg-icons";
import { loadListUserAction } from "../../Redux/Action/userAction";
import { Pagination } from "@material-ui/lab";

const User = () => {
  const [Add, setAdd] = useState([]);
  const dispatch = useDispatch();
  const { User } = useSelector(function (state) {
    return state.user;
  });

  useEffect(() => {
    dispatch(loadListUserAction());
  }, []);

  return (
    <div className={style.right}>
      {/* <Link to = "/Admin/Add" className = {style.btnFilm}> Thêm Phim</Link> */}

      <TableContainer className={style.HTDS} component={Paper}>
        <Table className={style.table}>
          <TableHead>
            <TableRow>
              <TableCell>STT</TableCell>
              <TableCell align="left">Tài Khoản</TableCell>
              <TableCell align="left">Tên Người Dùng</TableCell>
              <TableCell align="left">Hình Ảnh</TableCell>
              <TableCell align="left">Hanh Dong</TableCell>
            </TableRow>
          </TableHead>
          <TableBody>
            {User.map((item) => (
              <TableRow key={item.name}>
                <TableCell>{item.id}</TableCell>
                <TableCell align="left">{item.tai_khoan}</TableCell>
                <TableCell align="left">{item.ten_nguoi_dung}</TableCell>
                <TableCell align="left">
                  <img className={style.avatar} src={item.image}></img>
                </TableCell>
                <TableCell align="left">
                  <FontAwesomeIcon
                    style={{ marginRight: "5px" }}
                    icon={faPen}
                  ></FontAwesomeIcon>
                  <FontAwesomeIcon icon={faTrash}></FontAwesomeIcon>
                </TableCell>
              </TableRow>
            ))}
          </TableBody>
        </Table>
      </TableContainer>
      <div className={style.pagination}>
        <Pagination count={10} color="secondary" />
      </div>
    </div>
  );
};
export default User;
