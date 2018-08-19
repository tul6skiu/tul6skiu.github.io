#include <stdio.h>
int print1D(int arr[], int n)
{
    int i=0;
    for(i=0;i<n;i++)
    {
        printf("%d ",arr[i]);
    }
}
void fillFromStartNumber(int arr[],int n,int number)
{
    int i = 0;
    for(i = 0;i<n;i++)
    {
       arr[i] = number;
       number ++;
       
    }
    
}
int main()
{
    int n = 0,i = 0,arr[100],number = 0;
    scanf("%d %d", &number,&n);
    fillFromStartNumber(arr,n,number);
    print1D(arr,n);
   
   
}
