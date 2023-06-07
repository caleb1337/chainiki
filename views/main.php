<?php 
require "views/templates/header.php";
?>
            <div class="container">
               
            </div>    


        <script>
            //фетчом запрашиваем данные из БД и рендерим вместе с разметкой в блок див контейнер
            const container = document.querySelector('.container');
            container.addEventListener('click', deleteChainik);
            container.addEventListener('click', redactChainik);
            
            async function getChainiki(){
            
            const path = 'php/controllers/controller-get-chainiki.php';

            let response = await fetch(path),
                data = await response.json();
                console.log();
                drawInfo(data);
            }
            const drawInfo = (data) =>{
                data.map(item =>{
                    let htmlInjection = ` <div id="${item.id}" class="chainik">
                    <img src="./pics/chainik.png" alt="chainik${item.id}photo" class="photo">
                    <div class="info">
                           <form method="post">
                            <h4 class="brand">Бренд: <span>${item.name}</span></h4>
                            <label>Введите новое название чайника
                                <input type="text" id="brand" name="name" required>
                            </label>
                            <p id="chainik_article">Артикль: <span>${item.article}</span></p>
                             <label>Введите новый артикль чайника
                                <input type="text" id="article" name="article" required>
                            </label>
                            <p>Цена: <span>${item.price}</span> единиц</p>
                               <label>Введите новую цену чайника
                                   <input type="text" id="price" name="price" required>
                            </label>
                               <label class="label-id">ID:
                                <input type="text" name="id" value="${item.id}" id="chainik-id" readonly>
                                </label>
                            <button id="btn-redact" type="submit" class="btn">Редактировать</button>
                           </form>
                           <button id="btn-delete" class="btn">Удалить</button>
                    </div>
                </div>`;
                    //для каждого элемента массива дата отрисовать блок див с подготовленной разметкой
                    container.insertAdjacentHTML('afterbegin', htmlInjection);
                    // console.log(item);
                })
                // Item id спрятал от юзера. Он нужен только для поиска конкретного чайника в БД
            }
            getChainiki();
            function deleteChainik(event){
                let target = event.target;
                if(target.matches('#btn-delete')){
                    // let id = target.parentNode.parentNode;
                    let id = 0;
                    // console.log(id);
                    while(target = target.parentElement){
                        if(target.matches('.chainik')){
                            id = target.id;
                            break;
                        }
                    }
                    void function deleteFromDb(){
                        const path = 'php/controllers/controller-delete-chainik.php';
                        let params = new FormData();
                        params.set('id', id);
                        fetch(path,{
                            method: 'POST',
                            body: params,
                        });
                        location.reload();
                    }();
                }
            }


            function redactChainik(event) {
                // event.preventDefault();
                let target = event.target;
                if(target.matches('#btn-redact')){
                    while(target = target.parentElement){
                        if(target.matches('.chainik')){
                            let inputs = target.querySelectorAll('input');
                                console.log(inputs);
                            let values = [];
                            inputs.forEach(item =>{
                                values.push(item.value);
                            })
                                console.log(values);

                            void function redactDataInDb() {
                                let params = new FormData();
                                    params.set('name', values[0]);
                                    params.set('article', values[1]);
                                    params.set('price', values[2]);
                                    params.set('id', values[3]);
                                const path = 'php/controllers/controller-redact-chainik.php';
                                fetch(path,{
                                    method: 'POST',
                                    body: params,
                                });
                                // location.reload();  //Обновить страницу чтобы отобразились изменения
                            }();
                        }
                    }
                }






            }
        </script>
        </body>
    </html>