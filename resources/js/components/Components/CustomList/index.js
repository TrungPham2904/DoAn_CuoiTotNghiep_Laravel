import React from 'react'
import style from './style.module.css'

const List = ({
list = [],
renderItem = ()=>null,
styleContain = null
}) => {
    return(
        <ul className = {styleContain ? styleContain :style.list}>
            {
                list.map((item, index) => {
                    return (
                        <li>
                            { renderItem(item, index)}
                        </li>
                    )
                } )
            }
        </ul>
    )
}

export default List;