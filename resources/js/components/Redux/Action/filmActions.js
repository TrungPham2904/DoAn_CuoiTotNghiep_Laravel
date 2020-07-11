import {LOAD_LIST_FILM_REQUEST, LOAD_LIST_FILM_SUCCESS} from '../Constant/actionTypes'; //dung de truy cap toi 1 hanh dong



//film request data
export const loadListFilmAction = (payload)=>{
    return{
        type: LOAD_LIST_FILM_REQUEST,
        payload: payload// paramster
    }
}
//load success
export const loadListFilmSuccessAction = (payload)=>{
    return{
        type: LOAD_LIST_FILM_SUCCESS,
        payload: payload// paramster
    }
}

