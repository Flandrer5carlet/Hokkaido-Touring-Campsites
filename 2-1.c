#include <stdio.h>

void main() {
	int a;                              //  �ϐ�a�i�L�[�{�[�h����̒l����)
	int b;                              //  �ϐ�a�i�L�[�{�[�h����̒l����)
	printf("a=");                       //  �L�[�{�[�h����̓��͂𑣂�
	scanf("%d", &a);                     //  �L�[�{�[�h����ꕶ������
	printf("b=");                       //  �L�[�{�[�h����̓��͂𑣂�
	scanf("%d", &b);                     //  �L�[�{�[�h����ꕶ������
	printf("%d + %d = %d\n",a,b,a+b);
	printf("%d - %d = %d\n", a, b, a - b);
	printf("%d * %d = %d\n", a, b, a * b);
	printf("%d / %d = %d\n", a, b, a / b);
	printf("%d %% %d = %d\n", a, b, a % b);
}