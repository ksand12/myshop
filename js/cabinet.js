function delete_position(path, text1){
	//console.log(path);
	//console.log(text1);
	if(confirm(text1)){
		location.href = path;
	}
	return false;
	
}