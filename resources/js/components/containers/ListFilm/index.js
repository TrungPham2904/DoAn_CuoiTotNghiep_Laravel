import React, { Component , useState, useEffect} from "react";
import {useSelector, useDispatch} from 'react-redux'
import style from './style.module.css'
import { Route, Link } from "react-router-dom";
import axios from "axios";
import Table from '@material-ui/core/Table'
import TableBody from '@material-ui/core/TableBody';
import TableCell from '@material-ui/core/TableCell';
import TableContainer from '@material-ui/core/TableContainer';
import TableHead from '@material-ui/core/TableHead';
import TableRow from '@material-ui/core/TableRow';
import Paper from '@material-ui/core/Paper';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import {faPen, faTrash} from '@fortawesome/free-solid-svg-icons'
import {loadListFilmAction} from '../../Redux/Action/filmActions'
import { Pagination } from "@material-ui/lab";





const ListFilm = ()=> {
  const [Add, setAdd] = useState([]);
  const dispatch = useDispatch();
  const {listFilm} = useSelector(function(state){
    return state.film;
  })


  useEffect(() => {
    dispatch(loadListFilmAction())
  },[])

    return (
      
      <div className={style.right}>
      <Link to = "/Admin/Add" className = {style.btnFilm}> Thêm Phim</Link>

<TableContainer className = {style.HTDS} component={Paper}>
      <Table className={style.table} size="small" aria-label="a dense table">
        <TableHead>
          <TableRow>
            <TableCell>STT</TableCell>
            <TableCell align="right">Tên Phim</TableCell>
            <TableCell align="right">Hình ảnh</TableCell>
            <TableCell align="right">Thể loại</TableCell>
            <TableCell align="right">Ngôn ngữ phim</TableCell>
            <TableCell align="right">Nội Dung</TableCell>
            <TableCell align="right">Đánh giá</TableCell>
            <TableCell align="right">Quốc gia</TableCell>
            <TableCell align="right">Hành động</TableCell>
          </TableRow>
        </TableHead>
        <TableBody>
          {listFilm.map((item) => (
            <TableRow key={item.name}>
              <TableCell component="th" scope="Add">
                {item.id}
              </TableCell>
              <TableCell align="right">{item.ten_phim}</TableCell>
              <TableCell align="right"><img className = {style.avatar}  src = {item.avatar}></img></TableCell>
              <TableCell align="right">{item.loai_phim}</TableCell>
              <TableCell align="right">{item.ngon_ngu}</TableCell>
              <TableCell align="right">{item.noi_dung}</TableCell>
              <TableCell align="right">{item.danh_gia}</TableCell>
              <TableCell align="right">{item.quoc_gia}</TableCell>
              <TableCell align="right">
                <FontAwesomeIcon  style = {{marginRight:'5px'}} icon = {faPen}></FontAwesomeIcon>
                <FontAwesomeIcon icon = {faTrash}></FontAwesomeIcon>
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
      }
    


export default ListFilm;
