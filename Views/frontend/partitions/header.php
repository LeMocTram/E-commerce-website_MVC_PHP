<div class="header-container">
      <div class="logo">
        <a href="?controller=home">
            <img class="logo-image" src="https://4menshop.com/logo.png?v=1" alt="">
        </a>

      </div>
      <div class="catelog">
        <a href="?controller=product">Áo Nam</a>
        <a href="#">Quần Nam</a>
        <a href="#">Giày dép</a>
        <a href="#">Phụ kiện</a>
      </div>
      <div class="cart">
        <a href="#"><i class="fa-solid fa-cart-shopping"></i> </a>
      </div>
    </div>


    <style>
    *{
        font-family: Courier New;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .header-container{
        background: #fafafa;
        display: flex;
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1;
        border: 1px solid red;
        height:5rem;

        .logo{
            height:100%;
            width:20%;
            border :2px solid green;
            display:flex;
            align-items: center;
            justify-content:center;

            img{
                max-width: 100%;
                height: auto;
                }
        }
        .catelog{
            height:100%;
            width:60%;
            border :2px solid blue;
            display: flex;
            a{
                text-transform: uppercase;
                font-weight: 500;
                
                margin: auto;
                color: #333;
                text-decoration:none;
                font-size:calc(12px + 0.5vw);
               
            }
            a:hover{
                    color: #b31f2a;
                }
            
        }
        .cart{
            height:100%;
            width:20%;
            border :2px solid black;
            display: flex;
            a{
                margin: auto;
                i{
                font-size: 2rem;
            }
            }
            

        }
    }



</style>