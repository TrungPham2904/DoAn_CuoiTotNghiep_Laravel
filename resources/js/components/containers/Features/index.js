import React from 'react'
import CustomHeader from '../../Components/CustomHeader/index'
import style from './style.module.css'
import { GridList, GridListTile } from "@material-ui/core";
import DataFilm from "./data";
import { Pagination } from "@material-ui/lab";
import ItemFilm from "../../Components/ItemFilm/index";



function Features(){
    return(
        <div className = {style.main}>
            <div>
                <CustomHeader/>
            </div>
            <div className={style.right}>
      <h1>Phim Truyện</h1>
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
    )
}

export default Features;