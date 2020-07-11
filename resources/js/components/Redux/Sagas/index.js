import {all} from 'redux-saga/effects';
import {FilmSagas} from './Film'
import {UserSagas} from './User'

export function* rootSagas(){
    yield all([
        FilmSagas(),
        UserSagas()
    ]);
}
