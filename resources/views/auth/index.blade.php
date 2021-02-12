@extends(admin_template('layouts.app'))

@section('content')
    <div id="app" class="h-full flex items-center justify-center">
        <el-card class="w-96" shadow="hover">
            <template #header>
                <div>用户登录</div>
            </template>
            <el-form>
                <el-form-item>
                    <el-input></el-input>
                </el-form-item>
            </el-form>
        </el-card>
    </div>

    <script>
        const App = {
            data(){
                return {
                    message: 'hello'
                }
            }
        }
        Vue.createApp(App).use(ElementPlus).mount('#app')
    </script>
@endsection

@section('style')
    <style>
        html,body{
            height: 100%;
        }
    </style>
@endsection