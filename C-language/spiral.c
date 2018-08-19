
int main()
{
    int i = 0,j = 0,m = 0, n = 0, k = 1;
    int array[50][50];
    int left = 0,right = 0,top = 0,bottom = 0;
    scanf("%d %d", &n, &m);
    left = 0;
    right = m - 1;
    top = 0;
    bottom = n - 1;
    
  while(k <= m*n)
  {
      
      for (i = left; i <= right && k <= m * n; i++) {
          
            array[top][i] = k;
            k++;
            
        
        }
        
   
        
        for (i = top+1; i <= bottom && k <= m * n; i++) {
            array[i][right] = k;
            k++;
            
        }
        
        for (i = right-1; i>=left && k <= m * n; i--) {
            array[bottom][i] = k;
            k++;
            
        }
        for (i = bottom-1; i > top && k <= m * n; i--) {
            array[i][left] = k;
            k++;
        }  
        top++;
        right--;
        bottom--;
        left++;

  } 
   for(i=0;i < n;i++)
     {
         for(j = 0;j < m;j++)
         {
             printf("%3d",array[i][j]);
         }
         printf("\n");
     }

    return 0;
}
