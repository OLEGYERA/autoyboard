import axios from 'axios'

export const HTTP = axios.create({
    // baseURL: `https://api.yboard.com.ua/v1`,
    baseURL: `http://127.0.0.1:8000/v1`,
    // baseURL: `http://yboard.loc/v1`,
    headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Methods': 'GET,HEAD,OPTIONS,POST,PUT',
        'Access-Control-Allow-Headers': 'X-CSRF-Token, Origin, X-Requested-With, Content-Type, Accept, Authorization',
        'Access-Control-Allow-Credentials': true,
    }
})
