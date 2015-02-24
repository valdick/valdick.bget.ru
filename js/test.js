Ext.Loader.setConfig({enabled: true});
Ext.Loader.setPath('Ext', '/js/ext-4.2.1.883');
Ext.require([
    '*'
]);
// вводим модель
Ext.define('Users', {
    extend: 'Ext.data.Model',
    fields: ['name', 'education', 'city', 'id']         // список полей
});

var store = Ext.create('Ext.data.JsonStore', {     // определением хранилище для удаленного источника данных
    autoLoad: true,
    autoSync: true, // указание на автосохранение
    model: 'Users',// указание модели созданной выше
    proxy: {                    // описание proxy-объекта
        type: 'ajax',           // тип прокси
        actionMethods: {
            read: 'POST'
        },
        api: {
            read: '/grid/read',
            update: '/grid/update'
        },
        reader: {
            root: 'names'     // свойство JSON объекта в котором передается сам массив данных    
        }
    },
    remoteFilter: true
});
    
Ext.onReady(function() {
    
    var yourData = [    ['среднее', 'среднее'],
                        ['высшее', 'высшее'],
                        ['бакалавр', 'бакалавр'],
                        ['магистр', 'магистр']
                 ];
                 
    var Editing = Ext.create('Ext.grid.plugin.CellEditing');

    var grid = new Ext.grid.GridPanel({  //описываем таблицу
        title: 'Пользователи',
        id: 'myGrid',
        plugins: [Editing],
        store: store,
        columns: [
                new Ext.grid.RowNumberer(),
                {
                    header: "id",
                    width: 20,
                    dataIndex: 'id',
                    align: 'center',
                    hidden: true
                },          
                {
                    header: "Имя",
                    width: 200,
                    dataIndex: 'name',
                    align: 'center'
                },           
                {   
                    header: "Образование",
                    width: 200,
                    dataIndex: 'education',
                    id: 'education',
                    align: 'center',
                    sortable: true,
                    field: {
                        xtype: 'combobox',
                        store: new Ext.data.SimpleStore({
                            id:0,
                            fields: // как будут отображаться данные из yourData
                            [
                                'myId',   //номер элемента
                                'myText' //значение
                            ],
                            data:yourData //объектом данных
                        }),
                        valueField:'myId',  //содержит ключ
                        displayField:'myText', //связанное с ключом значение
                        queryMode:'local' //загружаем непосредственно из кода
                    }
                },
                
                {   
                    header: "Города",
                    width: 200,
                    dataIndex: 'city',
                    align: 'center'
                } 
            ],
        autoExpandColumn: 'name',
        renderTo: Ext.getBody(),
        width: 625,
        height: 300,
        loadMask: true,
        clicksToEdit: 2
    });
    
// Фильтр из чекбоксов для образования:
    var checkboxEducation = new Ext.form.CheckboxGroup({
        columns: 1,
        fieldLabel: 'Образование',
        name: 'education',
        items: [{
            xtype: 'checkbox',
            boxLabel: 'cреднее',
            name: 'среднее',
            checked: true
        },{
            xtype: 'checkbox',
            boxLabel: 'высшее',
            name: 'высшее',
            checked: true
        },{
            xtype: 'checkbox',
            boxLabel: 'бакалавр',
            name: 'бакалавр',
            checked: true
        },{
            xtype: 'checkbox',
            boxLabel: 'магистр',
            name: 'магистр',
            checked: true
        }],
        listeners: {
            change: function(){
                
                var grid = Ext.getCmp('myGrid'),
                    store = grid.getStore();
 
                store.clearFilter(true);
                
                var eduArray = [];
                var cityArray = [];
                
                Ext.Object.each( checkboxEducation.getValue(), function(key, value) {
                    eduArray.push(key); // добавляем в  массив новое значение образования
                });
 
                Ext.Object.each( checkboxCity.getValue(), function(key, value) {
                    cityArray.push(key); // добавляем в  массив значение города
                })
                
                store.filter([{
                        id: 'education',
                        property: 'education',
                        value: eduArray,
                        anyMatch: true 
                    },{
                        id: 'city',
                        property: 'city',
                        value: cityArray,
                        anyMatch: true 
                    }
                ]);
            }
        }
                
    });
// Фильтр из чекбоксов для города:

    var checkboxCity = new Ext.form.CheckboxGroup({
        columns: 1,
        fieldLabel: 'Город',
        name: 'city',
        items: [{
            xtype: 'checkbox',
            boxLabel: 'Солигорск',
            name: 'Солигорск',
            checked: true
        },{
            xtype: 'checkbox',
            boxLabel: 'Минск',
            name: 'Минск',
            checked: true
        },{
            xtype: 'checkbox',
            boxLabel: 'Москва',
            name: 'Москва',
            checked: true
        },{
            xtype: 'checkbox',
            boxLabel: 'Борисов',
            name: 'Борисов',
            checked: true
        }],
        listeners: {
            change: function(){
                
                var grid = Ext.getCmp('myGrid'),
                    store = grid.getStore();
 
                store.clearFilter(true);
                
                var eduArray = [];
                var cityArray = [];
                
                Ext.Object.each( checkboxEducation.getValue(), function(key, value) {
                    eduArray.push(key); // добавляем в  массив новое значение образования
                });

                Ext.Object.each( checkboxCity.getValue(), function(key, value) {
                    cityArray.push(key); // добавляем в  массив значение города
                })
                
                store.filter([{
                        id: 'education',
                        property: 'education',
                        value: eduArray,
                        anyMatch: true 
                    },{
                        id: 'city',
                        property: 'city',
                        value: cityArray,
                        anyMatch: true 
                    }
                ]);
            }
        }
                
    });

    var panel = new Ext.Panel({
        renderTo: Ext.getBody(),
        width:625,
        items: [checkboxEducation, checkboxCity]
    });
  
});