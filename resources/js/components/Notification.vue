<template>
    <main>        
        <div class="notifications">           
            <i class="fa fa-bell"></i>
            <span class="badge badge-pill badge-danger num">{{notifications.length}}</span>    
            <ul class="UL">  
                <div class="" v-if="notifications.length">
                    <li v-for="item in listar" :key="item.id">
                        <a class="LI" href="#">   
                            <span class="icon"> {{item.ingresos.numero}} </span>                 
                            <span class="text"> Ingresos {{item.ingresos.mjs}} </span>
                        </a>
                            <a class="LI" href="#">   
                            <span syle="color: red;" class="icon"> {{item.ventas.numero}} </span>                 
                            <span class="text"> Ventas {{item.ventas.mjs}} </span>
                        </a>
                    </li>
                </div> 
                <div class="" v-else>                                                  
                    <li style="list-style: none;" class="text-center">
                        <h3 class="LI" href="#">   
                            <span> No Tiene Notificaiones </span>             
                        </h3>
                    </li>
                </div>
            </ul>
        </div>                   
    </main>      
</template>
<script>
export default {     
	props : ['notifications'],
    data (){         
        return {
            arrayNotifications:[]
        } 
    },
    computed:{
        listar: function()  {
            // return this.notifications[0];
             this.arrayNotifications = Object.values(this.notifications[0]);
            if (this.notifications == '') {
                return this.arrayNotifications = []; 
            } else {
                //Capturo la ultima notificación agregada 
                this.arrayNotifications = Object.values(this.notifications[0]); 
                //Validación por indice fuera de rango
                if (this.arrayNotifications.length > 3) { 
                    //Si el tamaño es > 3 Es cuando las notificaciones son obtenidas desde el mismo servidor, es decir por la consulta con AXIOS 
                    return Object.values(this.arrayNotifications[4]); 
                } else { 
                    //Si el tamaño es < 3 Es cuando las notificaciones son obtenidas desde el canal privado, es decir mediante Laravel Echo y Pusher 
                    return Object.values(this.arrayNotifications[0]);
                } 
            }
        }
    }
}
</script>
<style>
    .notifications{
        background: #fff;
        text-align: center;
        border-radius: 30px;
        box-sizing: border-box;            
        height: 45px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0,0,0,.2);
    }
    .notifications:hover
    {
        width: 250px;
        height: 50px;
        text-align: left;
        padding: 0 15px;
        background: #ff2c74;
        transform: translateY(0%);
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .notifications:hover .fa{
        color: #fff;
    }        
    .notifications .fa{
        color: #cecece;
        line-height: 50px;
        font-size: 30px
    }
    .notifications:hover .num{
        position: relative;
        background: transparent;
        color: #fff;
        font-size: 24px;
        top: -4px;

    }
    .notifications:hover .num:after{
        content: ' Notificatones';
    }
    .notifications .num{
        position: absolute;
        top: 0;
        right: -5px;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: #ff2c74;
        color: #fff;
        line-height: 25px;
        font-family: sans-serif;
        text-align: center;
    }      
    .UL{
        position: absolute;
        left: 0;
        top: 50px;
        margin: 0;
        width: 100%;
        background: #fff;
        box-shadow: 0 5px 15px rgba(0,0,0,.5);
        padding: 20px;
        box-sizing: border-box;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
        display: none;
    }  
    .notifications:hover .UL{
        display: block;
    }
    .UL .LI{
        list-style: none;
        border-bottom: 1px solid rgba(0,0,0,.1);
        padding: 20px 0;
        display: flex;
    }
    .UL .LI:last-child{
        border-bottom: none;
    }
    .UL .LI .icon{
        width: 24px;
        height: 24px;
        background: #ccc;
        border-radius: 50%;
        text-align: center;
        line-height: 24px;   
        margin-right: 15px;         
    }
    .UL .LI .fa{
        color: #fff;
        font-size: 16px;
        line-height: 24px;
    }
    .Ul .LI .text{
        position: relative;
        font-family: sans-serif;
        top: 3px;
        cursor: pointer;
    }
    .Ul .LI:hover .text{
        font-weight: bold;
        color: #ff2c74;
    }
    li{
        list-style: none;
    }
</style>  