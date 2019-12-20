#include<stdio.h.>

//非递归
int binarySort($arr, $len, $key) 
{
	int low = 0;
	int high = len - 1;
	int mid = 0; 

	while(low <= hight) {
	
		mid = low + (high - low) / 2;  //high + low 溢出的问题 
	
		if (arr[mid] == key) {
	
			return mid;
	
		} else if (arr[mid] < key) {

			low = mid + 1;
			continue;
		}

		//arr[mid]  > key 
		high = mid - 1;
		continue;
	}
	return -1;
}

//递归
int binarySort(arr, low, high, key)
{
	if (low == high && arr[low] != key) return -1;

	mid = low + (high - low ) / 2;

	if (arr[mid] == key) return mid;

	if (arr[mid] < key)  return binarySort(arr, mid + 1, high, key);

	// arr[mid] > key
	return binarySort(arr, low, mid - 1, key);
}