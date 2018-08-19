
#include <stdio.h>
void print2D_array(int arr[][100], int n, int m)
{
    int i = 0, j = 0;
      for(i = 0;i < n;i++)
    {
        for(j = 0; j < m;j++)
        {
            printf("%d ", arr[i][j]);
        }
        printf("\n");
    }
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
    
    print2D_array(&arr[0][0],n,m);
    
    

    return 0;
}
