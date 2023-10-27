#include <stdio.h>

void main() {
	int a;                              //  変数a（キーボードからの値を代入)
	int b;                              //  変数a（キーボードからの値を代入)
	printf("a=");                       //  キーボードからの入力を促す
	scanf("%d", &a);                     //  キーボードから一文字入力
	printf("b=");                       //  キーボードからの入力を促す
	scanf("%d", &b);                     //  キーボードから一文字入力
	printf("%d + %d = %d\n",a,b,a+b);
	printf("%d - %d = %d\n", a, b, a - b);
	printf("%d * %d = %d\n", a, b, a * b);
	printf("%d / %d = %d\n", a, b, a / b);
	printf("%d %% %d = %d\n", a, b, a % b);
}