#include <stdio.h>
int findMaxIn2DArray(int arr[][100], int n, int m)
{
    int max = -2147483647,i = 0, j = 0;
    for(i = 0;i < n;i++)
    {
        for(j = 0; j < m;j++)
        {
            if(arr[i][j] > max)
            {
                max = arr[i][j];
            }
            
        }
   }
   return max;
} 
void firstOccurrenceOfMaxElem(int arr[][100],int n, int m,int *maxrow, int *maxcolumn,int maxElem)
{
    int i = 0, j = 0;
    for(i = 0; i < n;i++)
    {
        for(j = 0;j < m;j++)
        {
            if(arr[i][j] == maxElem)
            {
                *maxrow = i;
                *maxcolumn = j;
                 return ;
            }
        }
    }
    
}
int main()
{
    int n,m,arr[100][100],i = 0,j = 0, maxElem = -2147483647,maxrow = -1,maxcolumn = -1;
    scanf("%d %d", &n, &m);
    
    for(i = 0;i < n;i++)
    {
        for(j = 0;j < m;j++)
        {
            scanf("%d",&arr[i][j]);
        }
    }
    maxElem = findMaxIn2DArray(arr,n,m);
    firstOccurrenceOfMaxElem(arr, n, m, &maxrow, &maxcolumn, maxElem);
    printf("%d %d", maxrow, maxcolumn);

    return 0;
}
