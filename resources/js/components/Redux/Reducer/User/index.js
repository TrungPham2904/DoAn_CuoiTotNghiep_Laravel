import {LOAD_LIST_USER_SUCCESS} from '../../Constant/actionTypes';

// Initial State
const initialState = {
    User: []
};
// Redux: Counter Reducer
const userReducer = (state = initialState, action) => {
  switch (action.type) {
    case LOAD_LIST_USER_SUCCESS:{
        return{
            ...state,
            User: action.payload
        }
    }
    default: {
      return state;
    }
  }
};
// Exports
export default userReducer;
