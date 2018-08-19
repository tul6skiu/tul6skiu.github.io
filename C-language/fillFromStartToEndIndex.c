#include <stdio.h>
int print1D(int arr[], int n)
{
    int i=0;
    for(i=0;i<n;i++)
    {
        printf("%d ",arr[i]);
    }
}
void fillFromStartToEndIndex(int arr[], int number, int startindex, int endindex)
{
    int i = startindex;
    for(i = startindex; i <= endindex;i++)
    {
       arr[i] = number;
       number ++;
       
    }
    
}
int main()
{
    int arr[10]={-1,-1,-1,-1,-1,-1,-1,-1,-1,-1},number = 0;
    fillFromStartToEndIndex(arr, 100, 0, 2);
    fillFromStartToEndIndex(arr, 1000, 3, 7);
    fillFromStartToEndIndex(arr, 10000, 8, 9);
    print1D(arr,10);
    printf("\n");
    fillFromStartToEndIndex(arr, 1, 0, 9);
    print1D(arr,10);
   
   
}
