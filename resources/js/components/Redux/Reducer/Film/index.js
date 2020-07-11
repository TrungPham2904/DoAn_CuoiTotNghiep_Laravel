import {LOAD_LIST_FILM_SUCCESS} from '../../Constant/actionTypes';

// Initial State
const initialState = {
    listFilm: []
};
// Redux: Counter Reducer
const userReducer = (state = initialState, action) => {
  switch (action.type) {
    case LOAD_LIST_FILM_SUCCESS:{
        return{
            ...state,
            listFilm: action.payload
        }
    }
    default: {
      return state;
    }
  }
};
// Exports
export default userReducer;
