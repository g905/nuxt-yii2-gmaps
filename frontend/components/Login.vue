<template>
  <div class="container">
      <div class="login-form bg-light w-50 m-auto p-5">
        <form class="login-form" ref="loginForm">
          <div class="mb-2">
            <label for="login" class="col-form-label-sm">Логин</label>
            <input type="text" id="login" class="form-control form-control-sm" v-model="login" placeholder="Логин" required>
          </div>
          <div class="mb-2">
            <label for="pass" class="col-form-label-sm">Пароль</label>
            <input type="password" id="pass" class="form-control form-control-sm" v-model="pass" placeholder="Пароль" required>
          </div>
          <div class="text-center mt-5">
            <button type="submit" class="btn btn-info" @click="submit">Отправить</button>
          </div>
        </form>
      </div>
  </div>

</template>

<script>
    export default {
        data() {
            return {
              login: null,
              pass: null,
              from: null
            }
        },
        methods: {
          submit(e) {
            e.preventDefault();
            if(!this.validate(this.$refs['loginForm'])) {
              console.log("validation fail");
              return false;
            }
            this.send(this.$refs['loginForm']);
          },
          async send(form) {
            let self = this;
            const config = useRuntimeConfig();
            //console.log(config.public.apiBase)
            //console.log(this.$router.options.history.state)
            await $fetch('/login', {
              method: 'post',
              baseURL: config.public.apiBase,
              //headers: {
                //'Authorization': 'Basic ' + new Buffer(self.login + ':' + self.pass).toString('base64'),
              //},
              body: {
                data: {
                  login: self.login,
                  pass: self.pass
                }
              }
            }).then((data) => {
              if(parseInt(data["code"]) === 200) {
                localStorage.setItem("access_token", data["access_token"])
                localStorage.setItem("expires", (Math.floor(Date.now() / 1000) + (60 * 1)))


                if(this.$router.options.history.state.back) {
                  this.$router.back()
                } else {
                  this.$router.push('/')
                }
              }
            });
          },
          validate(form) {
            if(!this.login || !(this.login.trim())) {
              console.log("login is empty");
              return false;
            } else if (this.login.length > 25) {
              console.log("login too long");
              return false;
            } else if (!this.pass || !(this.pass.trim())) {
              console.log("pass is empty");
              return false;
            }
            return true;
          }
        },
        mounted() {
        },
    }
</script>


<style>
</style>
