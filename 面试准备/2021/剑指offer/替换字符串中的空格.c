/*
请实现一个函数，把字符串 s 中的每个空格替换成"%20"。

 

示例 1：

输入：s = "We are happy."
输出："We%20are%20happy."

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/ti-huan-kong-ge-lcof
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/


/*
	思路 : 1.统计空格数    2.扩展字符串大小  3. 从后向前逐个更新
	时空复杂度 O(n) O(1)
*/
char* replaceSpace(char* s){

    int whiteSpace = 0, len = 0;
    for(int i=0; s[i] != '\0'; i++) {
    	if (s[i] == ' ') {
            whiteSpace++;
        }
        len++;
    }

    if (whiteSpace == 0) return s;



    s = (char* )realloc(s, sizeof(char) * (len  + 2 * whiteSpace + 1));
    s[len + 2 * whiteSpace] = '\0';

    int k = len + 2 * whiteSpace - 1;
    for(int i = len - 1; i >= 0; --i) {
        if(s[i] != ' '){
            s[k--] = s[i];
        }else {
            s[k--] = '0';
            s[k--] = '2';
            s[k--] = '%';
        }
    }
    return s;
}
