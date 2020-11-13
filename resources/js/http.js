import axios from 'axios'

export const HTTP = axios.create({
<<<<<<< HEAD
    baseURL: `https://api.yboard.com.ua/v1`,
    // baseURL: `http://127.0.0.1:8000/v1`,
    // baseURL: `http://yboard.loc/v1`,
=======
    // baseURL: `https://api.yboard.com.ua/v1`,
    // baseURL: `http://127.0.0.1:8000/v1`,
    baseURL: `http://yboard.loc/v1`,
>>>>>>> fb220bd9f80eddcaaaea14799f2e799f1d5d97f0
    headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Methods': 'GET,HEAD,OPTIONS,POST,PUT',
        'Access-Control-Allow-Headers': 'X-CSRF-Token, Origin, X-Requested-With, Content-Type, Accept, Authorization',
        'Access-Control-Allow-Credentials': true,
    }
})
