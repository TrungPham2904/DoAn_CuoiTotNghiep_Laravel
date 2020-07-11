import React from "react";
import CustomHeader from "../../Components/CustomHeader/index";
import style from "./style.module.css";
import ItemFilm from "../../Components/ItemFilm";
import { Pagination } from "@material-ui/lab";
import { GridList, GridListTile } from "@material-ui/core";
import Datafilmkinhdi from './datafilmkinhdi'
import Datafilmhai from './datafilmhai'
import Datafilmtruyen from './datafilmtruyen'
import Datafilmngan from './datafilmngan'



function Seris() {
  return (
    <div className={style.main}>
      <div>
        <CustomHeader />
      </div>

      <div className={style.right}>
        <div className={style.film_kd}>
          <h2>Phim Kinh Dị</h2>
          <GridList className={style.list_film} cellHeight={"auto"} cols={4}>
          {Datafilmkinhdi.map((item, k) => (
            <GridListTile>
              <ItemFilm
                nameFilm={item.nameFilm}
                image={item.image}
                content={item.content}
                Category={item.Category}
                key={k}
              ></ItemFilm>
            </GridListTile>
          ))}
        </GridList>
        </div>
        <div className={style.film_hai}>
          <h2>Phim Hài Hước</h2>
          <GridList className={style.list_film} cellHeight={"auto"} cols={4}>
          {Datafilmhai.map((item, k) => (
            <GridListTile>
              <ItemFilm
                nameFilm={item.nameFilm}
                image={item.image}
                content={item.content}
                Category={item.Category}
                key={k}
              ></ItemFilm>
            </GridListTile>
          ))}
        </GridList>
        </div>
        <div className={style.hanhdong}>
          <h2>Phim Truyện</h2>
          <GridList className={style.list_film} cellHeight={"auto"} cols={4}>
          {Datafilmtruyen.map((item, k) => (
            <GridListTile>
              <ItemFilm
                nameFilm={item.nameFilm}
                image={item.image}
                content={item.content}
                Category={item.Category}
                key={k}
              ></ItemFilm>
            </GridListTile>
          ))}
        </GridList>
        </div>
        <div className={style.film_tinhcam}>
          <h2>Phim Ngắn</h2>
          <GridList className={style.list_film} cellHeight={"auto"} cols={4}>
          {Datafilmngan.map((item, k) => (
            <GridListTile>
              <ItemFilm
                nameFilm={item.nameFilm}
                image={item.image}
                content={item.content}
                Category={item.Category}
                key={k}
              ></ItemFilm>
            </GridListTile>
          ))}
        </GridList>
        </div>
      </div>
      <div className={style.pagination}>
        <Pagination count={10} color="secondary" />
      </div>
    </div>
  );
}

export default Seris;
