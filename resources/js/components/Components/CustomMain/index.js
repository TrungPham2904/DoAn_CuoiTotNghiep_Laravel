import React, { useState, useEffect } from "react";
import style from "./style.module.css";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {
  faSearch,
  faAngleLeft,
  faAngleRight,
} from "@fortawesome/free-solid-svg-icons";
import ItemFilm from "../../Components/ItemFilm";
import { GridList, GridListTile } from "@material-ui/core";
import DataFilm from "./data";
import { Pagination, Autocomplete } from "@material-ui/lab";
import TextField from '@material-ui/core/TextField';
import Datafilm from './datafilm';
import Combobox from '../../Components/ComboBox'
import DatanStylefilm from './stylefilm'
import Datangongu from './datangongu'
import Sapxep from './sapxep'
import Datadanhgia from './datadanhgia'
import {Link } from "react-router-dom";






function CustomMain() {
  return (
    <div>
    
      <div className={style.nav_right}>
        <div className={style.search}>
          <FontAwesomeIcon
            className={style.icon_search}
            icon={faSearch}
          ></FontAwesomeIcon>{" "}
          <input className = {style.finFm} placeholder="Find movie, TV shows" type={"text"}></input>
        </div>
        <div className={style.header_right}>
          
            <div className = {style.navHeader} >
            <h1 className = {style.homePage}>Trang Chủ</h1>
              <Combobox className = "navChild" data = {Datafilm} nameCbb = "Thể loại"/>
              <Combobox nameCbb = "Ngôn ngữ" data = {Datangongu}/>
              <Combobox nameCbb = "Kiểu Phim" data = {DatanStylefilm} />
              <Combobox nameCbb = "Đánh giá" data = {Datadanhgia}/>
              <Combobox nameCbb = "Sắp Xếp"  data = {Sapxep}/>
            </div>
      
        </div>
      
      
      
        {/* <ItemFilm /> */}
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
        <div className = {style.login}>
        <button className = "btn btn-primary hw"><Link style = {{color:"white"}} to = '/Login'>Login</Link></button>
        </div>
      </div>
    </div>
  );
}
export default CustomMain;






















// function CustomMain() {
//     const array = ["imgs/venom.jpeg", "imgs/slideshow(5).jpg", "imgs/slideshow(6).jpg"];
//     const [imgShow, setImageShow] = useState({ value: 0 });
//     useEffect(() => {
//         setInterval(function () {

//             if (imgShow.value < 2) {

//                 imgShow.value += 1;
//                 setImageShow({ ...imgShow });
//             } else {
//                 imgShow.value = 0;
//                 setImageShow({ ...imgShow });
//             }
//         }, 3000)
//     }, [])
//     return (

//         <div className="slider">
//             <div className="slideshow">
//                 <img className="hinh1" src={array[imgShow.value]} alt="" />
//             </div>

//             <div className="buy-ticked">
//                 <div className="tab-header">
//                     <h5>Theo rạp</h5>
//                     <h5>Theo phim</h5>
//                 </div>
//                 <div className="tab-content">
//                     <div>
//                         <form id="frm-cinema">
//                             <select name="" id="select-cinema">
//                                 <option value="">Chọn rạp</option>
//                                 <option value="">Quận 10, TP. HCM</option>
//                                 <option value="">Quận Bình Thạnh, TP. HCM</option>
//                                 <option value="">Quận 2, TP. HCM</option>
//                                 <option value="">Quận 1, TP. HCM</option>
//                             </select>
//                             <select name="" id="select-cinema">
//                                 <option value="">Chọn ngày</option>
//                             </select>
//                             <select name="" id="select-cinema">
//                                 <option value="">Chọn suất</option>
//                             </select>
//                             <select name="" id="select-cinema">
//                                 <option value="">Chọn phim</option>
//                             </select>
//                             <button type="submit" className="buy-cinema">$Mua vé</button>
//                         </form>
//                     </div>
//                     <div>
//                         <form id="frm-cinema">
//                             <select name="" id="select-cinema">
//                                 <option value="">Chọn phim</option>
//                                 <option value="">Quận 10, TP. HCM</option>
//                                 <option value="">Quận Bình Thạnh, TP. HCM</option>
//                                 <option value="">Quận 2, TP. HCM</option>
//                                 <option value="">Quận 1, TP. HCM</option>
//                             </select>
//                             <select name="" id="select-cinema">
//                                 <option value="">Chọn rạp</option>
//                             </select>
//                             <select name="" id="select-cinema">
//                                 <option value="">Chọn ngày</option>
//                             </select>
//                             <select name="" id="select-cinema">
//                                 <option value="">Chọn xuất</option>
//                             </select>
//                             <button type="submit" className="buy-cinema">$Mua vé</button>
//                         </form>
//                     </div>
//                 </div>
//             </div>
//         </div>
//     )
// }
