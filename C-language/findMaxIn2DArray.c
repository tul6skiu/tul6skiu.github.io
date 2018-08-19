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
int main()
{
    int n,m,arr[100][100],i = 0,j = 0;
    scanf("%d %d", &n, &m);
    
    for(i = 0;i < n;i++)
    {
        for(j = 0;j < m;j++)
        {
            scanf("%d",&arr[i][j]);
        }
    }
    printf("%d",findMaxIn2DArray(arr,n,m));
    return 0;
}
