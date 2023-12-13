class Token{
    isValid(token){
        const payload = this.payload(token)
        if(payload){
            return payload.iss = "http://10.10.21.17:9999/api/auth/login" || "http://10.10.21.17:9999/api/auth/register" ? true:false

        }
        return false
    }

    payload(token){
        const payload = token.split('.')[1]
        return this.decode(payload) //base 64
    }

    decode(payload){
        return JSON.parse(atob(payload))
    }

}
export default new Token();
