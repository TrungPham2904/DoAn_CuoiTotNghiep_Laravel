import {all} from 'redux-saga/effects';
import loadListUserSagas from './loadListUserSagas';

export const UserSagas = function* root() {
  yield all([loadListUserSagas()]);
};
