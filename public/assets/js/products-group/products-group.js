function deactivateProductGroup(e){e.value;const t=document.querySelector('meta[name="csrf-token"]').getAttribute("content");Swal.fire({title:"Confirmação",html:"Realmente deseja desativar este grupo de produtos?",showCancelButton:!0,confirmButtonColor:"#C82333"}).then((e=>{e.isConfirmed&&$.ajax({url:window.location.href+"/"+user,type:"POST",headers:{"X-CSRF-TOKEN":t},data:{_method:"delete"}}).always((function(){window.location.reload()}))}))}
