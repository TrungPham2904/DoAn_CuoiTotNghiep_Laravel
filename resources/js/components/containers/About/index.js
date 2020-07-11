import React from 'react'
import style from './style.module.css'
import CustomHeader from '../../Components/CustomHeader'


function Abouts(){
    return(
        <div className = {style.main}>
            <div>
                <CustomHeader />
            </div>
            <div className = {style.right}>
                <h1>Sinh Viên Thực Hiện</h1>
                <p> <b> Họ và Tên:</b> Trần Văn Thịnh_0306171408, Phạm Khắc Trung_0306171418</p>
                <p><b>Đề Tài:</b> Làm Website xem phim bằng React JS</p>
                <h2>Giới Thiệu Đề Tài</h2>
            </div>
        </div>
    )
}
export default Abouts;