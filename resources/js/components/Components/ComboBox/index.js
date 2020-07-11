import React from 'react'
import TextField from '@material-ui/core/TextField';
import { Pagination, Autocomplete } from "@material-ui/lab";
import Datafilm from '../CustomMain/datafilm';
import style from './style.module.css'

function Combobox({
  nameCbb = "",
  classes = {},
  data = ""
}){
    return(
        <Autocomplete
            
            id="combo-box-demo"
            options={data}
            getOptionLabel={(option) => option.title}
             style={{ width: 160}}
            renderInput={(params) => (
              <TextField className = {style.demo} {...params} label={nameCbb} variant="outlined" />
            )}
          />
    )
}
export default Combobox;