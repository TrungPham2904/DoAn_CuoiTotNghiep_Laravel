import React from "react";
import CustomHeader from "../../Components/CustomHeader/index";
import CustomMain from "../../Components/CustomMain/index";
import ItemFilm from "../../Components/ItemFilm/index";
import style from "./style.module.css";

import { GridList, GridListTile } from "@material-ui/core";
import DataFilm from "./data";
import { Pagination } from "@material-ui/lab";

function MyList() {
  return (
    <div className={style.main} style={{ padding: "50px" }}>
      <div className={style.header}>
        <CustomHeader />
      </div>

      <div className = {style.right}>
      <h1>Danh Sách Của Tôi</h1>
        <GridList className={style.list_film} cellHeight={"auto"} cols={4}>
          {DataFilm.map((item, k) => (
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
        <div className={style.pagination}>
          <Pagination count={10} color="secondary" />
        </div>
      </div>
    </div>
  );
}
export default MyList;
