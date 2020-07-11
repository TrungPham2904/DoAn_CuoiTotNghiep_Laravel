import {LOAD_LIST_USER_REQUEST, LOAD_LIST_USER_SUCCESS} from '../Constant/actionTypes';


export const loadListUserAction = (payload)=>{
    return{
        type:LOAD_LIST_USER_REQUEST,
        payload: payload
    }
}

export const loadListUserSuccessAction = (payload)=>{
    return{
        type: LOAD_LIST_USER_SUCCESS,
        payload: payload
    }
}