@extends(admin_template('layouts.app'))

@section('content')
    <div id="app" class="h-full flex items-center justify-center">
        <el-card class="login-card" shadow="hover">
            <template #header>
                <div>用户登录</div>
            </template>
            <el-form>

                <el-form-item>
                    <el-input>
                        <template #prepend>
                            <div class="w-16 text-center">登录账号</div>
                        </template>
                    </el-input>
                </el-form-item>

                <el-form-item>
                    <el-input>
                        <template #prepend>
                            <div class="w-16 text-center">登录密码</div>
                        </template>
                    </el-input>
                </el-form-item>

                <div>
                    <el-button type="primary" class="w-full" @click="onSubmit" :loading="state.submit">登录</el-button>
                </div>

            </el-form>
        </el-card>
    </div>

    <script>
        createVueApp('#app', {
            data() {
                return {
                    message: 'hello'
                }
            },
            methods: {
                onSubmit(){
                    this.$toggle('submit')
                }
            }
        })
    </script>
@endsection

@section('style')
    <style>
        html, body {
            height: 100%;
        }

        .login-card {
            width: 480px;
        }
    </style>
@endsection