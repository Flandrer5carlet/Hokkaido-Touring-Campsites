jQuery(function($){
  $(".hoge").click(function(){
      $(this).css("background-color","blue")
      $(this).val("検索中・・・")
  });
});

console.log(myVar);

const sortableTable = new SortableTable();
// set table element
sortableTable.setTable(document.querySelector('#my-table1'));
// set data to be sorted
sortableTable.setData(myVar);
// handling events
sortableTable.events()
    .on('sort', (event) => {
      console.log(`[SortableTable#onSort]
    event.colId=${event.colId}
    event.sortDir=${event.sortDir}
    event.data=\n${JSON.stringify(event.data)}`);
    });